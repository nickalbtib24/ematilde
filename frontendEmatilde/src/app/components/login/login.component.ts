import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { PrincipalService } from 'src/app/services/principal.service';

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

  constructor(private Principal:PrincipalService) { }

  onSubmit(){
     this.Principal.login(this.form).subscribe(
     data => console.log(data),
     error => this.handleError(error)
   );
  }

  handleError(error){
    this.error = error.error.error;
  }

  ngOnInit() {
  }

}
