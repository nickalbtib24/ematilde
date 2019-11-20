import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { PrincipalService } from 'src/app/services/principal.service';
import { TokenService } from 'src/app/services/token.service';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public form={
    email:null,
    password:null
  }


  public error = null

  constructor(
    private Principal:PrincipalService,
    private Token:TokenService,
    private Router : Router,
    private Auth : AuthService,
  ) { }

  onSubmit(){
     this.Principal.login(this.form).subscribe(
     data => this.handleResponse(data),
     error => this.handleError(error)
   );
  }

  handleResponse(data){

    this.Token.handle(data.access_token)
    this.Auth.changeAuthStatus(true)
    this.Router.navigateByUrl('/dashboard-client')
  }

  handleError(error){
    this.error = error.error.error;
  }

  ngOnInit() {
  }

}
