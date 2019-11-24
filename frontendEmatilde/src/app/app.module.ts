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


import { VerifyUserComponent } from './components/verify/verify-user/verify-user.component';
import { ClientsComponent } from './components/admin/admin-pages/clients/clients.component';
import { AddCampaignComponent } from './components/client/pages_client/add-campaign/add-campaign.component';
import { DashboardCampaignComponent } from './components/client/pages_client/dashboard-campaign/dashboard-campaign.component';
import { CampaignsClientComponent } from './components/client/pages_client/campaigns-client/campaigns-client.component';
import { DashboardClientComponent } from './components/client/pages_client/dashboard-client/dashboard-client.component';
import { ProfileClientComponent } from './components/client/pages_client/profile-client/profile-client.component';
import { ClientContainerComponent } from './components/client/client-container/client-container.component';
import { AdminContainerComponent } from './components/admin/admin-container/admin-container.component';
import {MatTableModule} from '@angular/material/table';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CampaignsComponent } from './components/admin/admin-pages/campaigns/campaigns.component'

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
    DashboardCampaignComponent,
    AddCampaignComponent,
    ClientsComponent,
    CampaignsClientComponent,
    DashboardClientComponent,
    ProfileClientComponent,
    ClientContainerComponent,
    AdminContainerComponent,
    ProfileClientComponent,
    CampaignsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    RouterModule,
    FormsModule,
    HttpClientModule,
    ChartsModule,
    MatTableModule,
    BrowserAnimationsModule 
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
