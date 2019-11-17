import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ChartsModule} from 'ng2-charts';

import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { ProfileComponent } from './components/profile/profile.component';
import { RequestResetComponent } from './components/password/request-reset/request-reset.component';
import { ResponseResetComponent } from './components/password/response-reset/response-reset.component';
import { AppRoutingModule } from './app-routing.module';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { UserComponent } from './components/user/user.component';
<<<<<<< HEAD
import { VerifyUserComponent } from './components/verify/verify-user/verify-user.component';
import { NavbarClientComponent } from './components/client/start-bars/navbar-client/navbar-client.component';
import { FooterClientComponent } from './components/client/start-bars/footer-client/footer-client.component';
import { SidebarClientComponent } from './components/client/start-bars/sidebar-client/sidebar-client.component';
import { SidebarAdminComponent } from './components/admin/admin-bars/sidebar-admin/sidebar-admin.component';
import { NavbarAdminComponent } from './components/admin/admin-bars/navbar-admin/navbar-admin.component';
import { FooterAdminComponent } from './components/admin/admin-bars/footer-admin/footer-admin.component';
=======

import { VerifyUserComponent } from './components/verify/verify-user/verify-user.component';
>>>>>>> fa530767c94ea851598dee19130d035e00042d23
import { ClientsComponent } from './components/admin/admin-pages/clients/clients.component';
import { AddCampaignComponent } from './components/client/pages_client/add-campaign/add-campaign.component';
import { DashboardCampaignComponent } from './components/client/pages_client/dashboard-campaign/dashboard-campaign.component';
import { CampaignsClientComponent } from './components/client/pages_client/campaigns-client/campaigns-client.component';
import { DashboardClientComponent } from './components/client/pages_client/dashboard-client/dashboard-client.component';
import { ProfileClientComponent } from './components/client/pages_client/profile-client/profile-client.component';
import { ClientContainerComponent } from './components/client/client-container/client-container.component';
import { AdminContainerComponent } from './components/admin/admin-container/admin-container.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    LoginComponent,
    SignupComponent,
    ProfileComponent,
    RequestResetComponent,
    ResponseResetComponent,
    UserComponent,
    VerifyUserComponent,
<<<<<<< HEAD
    NavbarClientComponent,
    FooterClientComponent,
    SidebarClientComponent,
=======
>>>>>>> fa530767c94ea851598dee19130d035e00042d23
    DashboardCampaignComponent,
    AddCampaignComponent,
    ClientsComponent,
    CampaignsClientComponent,
    DashboardClientComponent,
    ProfileClientComponent,
    ClientContainerComponent,
    AdminContainerComponent,
    ProfileClientComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    RouterModule,
    FormsModule,
    HttpClientModule,
    ChartsModule,

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
