import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PrincipalService {

  private baseUrl = 'http://localhost:80/ProyectoDeGrad/ematilde/ematilde/public/api';

  constructor(private http: HttpClient) { }


  login(data){
    return this.http.post(`${this.baseUrl}/login`,data)
  }

  signup(data){
    return this.http.post(`${this.baseUrl}/signup`,data)
  }

  createInform(data){
    return this.http.post(`${this.baseUrl}/new_inform`,data)
  }

  getTipoClientes(){
    return this.http.get(`${this.baseUrl}/tipo_clientes`)
  }

  getKpi(id){
    return this.http.get(`${this.baseUrl}/informe_clientes/`+id)
  }

  getCampaignsByUser(id){
    return this.http.get(`${this.baseUrl}/campanas_user/`+id)
  }

  getCampaignInform(id){
    return this.http.get(`${this.baseUrl}/campana_inform/`+id)
  }

  getClients(){
    return this.http.get(`${this.baseUrl}/clients`)
  }
}
