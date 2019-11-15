import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

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
=======
import { NavbarClientComponent } from './components/client/start-bars/navbar-client/navbar-client.component';
import { FooterClientComponent } from './components/client/start-bars/footer-client/footer-client.component';
import { SidebarClientComponent } from './components/client/start-bars/sidebar-client/sidebar-client.component';
import { SidebarAdminComponent } from './components/admin/admin-bars/sidebar-admin/sidebar-admin.component';
import { NavbarAdminComponent } from './components/admin/admin-bars/navbar-admin/navbar-admin.component';
import { FooterAdminComponent } from './components/admin/admin-bars/footer-admin/footer-admin.component';
import { ClientsComponent } from './components/admin/admin-pages/clients/clients.component';
import { AddCampaignComponent } from './components/client/pages_client/add-campaign/add-campaign.component';
import { DashboardCampaignComponent } from './components/client/pages_client/dashboard-campaign/dashboard-campaign.component';
import { CampaignsClientComponent } from './components/client/pages_client/campaigns-client/campaigns-client.component';
import { DashboardClientComponent } from './components/client/pages_client/dashboard-client/dashboard-client.component';
import { ProfileClientComponent } from './components/client/pages_client/profile-client/profile-client.component';
>>>>>>> 9404201dc7fc93bee19ac7c6125c0a9d5c61120a

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
<<<<<<< HEAD
    VerifyUserComponent
=======
    NavbarClientComponent,
    FooterClientComponent,
    SidebarClientComponent,
    DashboardCampaignComponent,
    AddCampaignComponent,
    SidebarAdminComponent,
    NavbarAdminComponent,
    FooterAdminComponent,
    ClientsComponent,
    CampaignsClientComponent,
    DashboardClientComponent,
    ProfileClientComponent
>>>>>>> 9404201dc7fc93bee19ac7c6125c0a9d5c61120a
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    RouterModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
