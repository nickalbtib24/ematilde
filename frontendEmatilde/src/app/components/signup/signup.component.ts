import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

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

  public error = null;

  constructor(private http:HttpClient) { }

  ngOnInit() {
    this.http.get('http://localhost:80/proyectoGrad1/ematilde/public/index.php/api/tipo_clientes').subscribe((data: any[])=>{
      console.log(data);
      this.tipoUsuarios = data;
    })
  }

  onSubmit(){
   return this.http.post('http://localhost:80/proyectoGrad1/ematilde/public/index.php/api/signup',this.form).subscribe(
     data => console.log(data),
     error => this.handleError(error)
   );
  }

  handleError(error){
    this.error = error;
  }


}
