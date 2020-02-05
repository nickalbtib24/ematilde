import { Component, OnInit, Input } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/services/token.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  public loggedIn: boolean;
  public admin = false;
  public client = false;
  constructor(
    private Auth: AuthService,
    private Router: Router,
    private Token: TokenService
    ) { }


  activateClient(){
    this.client = true;
  }
  activateAdmin(){
    this.admin = true;
  }
  ngOnInit() {
    this.Auth.authStatus.subscribe(value => this.loggedIn = value);
    this.changeStatus();
  }

  public changeStatus(){
    if (this.loggedIn) {
      if (this.Token.getProfile() === '1' ) {
        this.admin = true;
      } else {
        console.log('hallo');
        this.client = true;
      }
    }
  }

  public logThis(param): void {
    console.log("in"+param);
  }

  logout(event: MouseEvent) {
    event.preventDefault();
    this.client = false;
    this.admin = false;
    this.Token.remove();
    this.Auth.changeAuthStatus(false);
    this.Router.navigateByUrl('/login');
  }

}
