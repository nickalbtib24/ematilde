import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/services/token.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  public loggedIn : boolean
  constructor(
    private Auth : AuthService,
    private Router : Router,
    private Token : TokenService
    ) { }

  ngOnInit() {
    this.Auth.authStatus.subscribe(value => this.loggedIn = value)
    console.log(this.loggedIn)
  }

  logout(event : MouseEvent){
    event.preventDefault()
    this.Token.remove()
    this.Auth.changeAuthStatus(false)
    this.Router.navigateByUrl('/login')
  }

}
