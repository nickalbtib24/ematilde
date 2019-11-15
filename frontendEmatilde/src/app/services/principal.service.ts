import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PrincipalService {

  private baseUrl = 'http://localhost:8888/proyectoGrad1/ematilde/public/index.php/api'

  constructor(private http: HttpClient) { }


  login(data){
    return this.http.post(`${this.baseUrl}/login`,data)
  }

  signup(data){
    return this.http.post(`${this.baseUrl}/signup`,data)
  }

  getTipoClientes(){
    return this.http.get(`${this.baseUrl}/tipo_clientes`)
  }
}
