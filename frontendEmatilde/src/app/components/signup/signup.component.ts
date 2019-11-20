import { Component, OnInit } from '@angular/core';
import { PrincipalService } from 'src/app/services/principal.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  public form = {
    nombre_usuario: null,
    apellido_usuario: null,
    edad_usuario: null,
    email: null,
    password: null,
    password_confirmation:null,
    identificacion_usuario: "11323",
    empresa_usuario: null,
    telefono_usuario: null,
    direccion_usuario: "Calle 174",
    tipo_cliente: null,

  }
  public tipoUsuarios=null;

  public response = [];

  public error = [];

  constructor(
    private Principal:PrincipalService,
    private Router : Router,
    ) { }

  ngOnInit() {
    this.Principal.getTipoClientes().subscribe((data: any[])=>{
      console.log(data);
      this.tipoUsuarios = data;
    })
  }

  onSubmit(){
    this.Principal.signup(this.form).subscribe(
     error => this.handleError(error),

   );
  }

  handleError(error){
    this.error = error;
    if (error.success){
      this.Router.navigateByUrl('/login')

    }
  }

}
