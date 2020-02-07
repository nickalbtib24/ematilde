import { Component, OnInit , Output} from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { PrincipalService } from 'src/app/services/principal.service';
import { TokenService } from 'src/app/services/token.service';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { User } from 'src/app/models/user.model';
import { EventEmitter } from '@angular/core';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  @Output() public sendChange: EventEmitter<any> = new EventEmitter<any>();

  public user: User;
  public form  = {
    email: null,
    password: null
  };


  public error = [];

  constructor(
    private Principal: PrincipalService,
    private Token: TokenService,
    private Router: Router,
    private Auth: AuthService,
  ) {
    this.user = {
      id: 0,
      name: '',
      lastName: '',
      enterprise: '',
      email: '',
      client: 0,
      profile: 0
    };
  }

  onSubmit() {
    
     this.Principal.login(this.form).subscribe(
     data => this.handleResponse(data),
     error => this.handleError(error)
   );
   //this.sendChange.emit('change');
  }

  handleResponse(data) {
    this.user.id = data.id;
    this.Token.handle(data.access_token, data.user, data.role);
    this.Auth.changeAuthStatus(true);
    if (data.role === 2) {
      this.Router.navigateByUrl('/dashboard-client');
    } else {
      this.Router.navigateByUrl('/clients');
    }
  }

  handleError(error) {
    console.log(error.error);
    this.error = error.error;
  }

  ngOnInit() {
  }

}
