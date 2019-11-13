import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { RequestResetComponent } from './components/password/request-reset/request-reset.component';
import { ProfileComponent } from './components/profile/profile.component';
import { ResponseResetComponent } from './components/password/response-reset/response-reset.component';
import { UserComponent } from './components/user/user.component';
import { BeforeLoginService } from './services/before-login.service';
import { AfterLoginService } from './services/after-login.service';
import { DashboardClientComponent} from './components/client/pages_client/dashboard-client/dashboard-client.component';
import { CampaignsClientComponent} from './components/client/pages_client/campaigns-client/campaigns-client.component';

const appRoutes: Routes = [

  { path: '',
    redirectTo: '/login',
    pathMatch: 'full'
  },
  {
    path:'login',
    component: LoginComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path:'signup',
    component: SignupComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path:'profile',
    component: ProfileComponent,
    canActivate: [AfterLoginService]
  },
  {
    path:'request-password-reset',
    component: RequestResetComponent,
  },
  {
    path:'response-password-reset',
    component: ResponseResetComponent,
  },
  {
    path: 'user',
    component: UserComponent,
  },
  {
    path: 'dashboard-client',
    component: DashboardClientComponent,
  },
  {
    path: 'campaigns-client',
    component: CampaignsClientComponent,
  },



]

@NgModule({
  declarations: [],
  imports: [
    RouterModule.forRoot(appRoutes)
  ]
})
export class AppRoutingModule { }
