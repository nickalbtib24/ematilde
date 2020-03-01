import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PrincipalService {

  private baseUrl = 'http://localhost:80/ProyectoDeGrad/ematilde/ematilde/public/api';

  constructor(
    private http: HttpClient) { }


  public login(data) {
    return this.http.post(this.baseUrl + '/login', data);
  }

  public signup(data) {
    return this.http.post(this.baseUrl + '/signup', data);
  }

  public editProfile(data) {
    return this.http.post(this.baseUrl + '/modifyUser', data);
  }

  public createInform(data) {
    return this.http.post(this.baseUrl + '/new_inform', data);
  }

  public getTipoClientes() {
    return this.http.get(this.baseUrl + '/tipo_clientes');
  }

  public getKpi(id) {
    return this.http.get(this.baseUrl + '/informe_clientes/' + id);
  }

  public getCampaignsByUser(id) {
    return this.http.get(this.baseUrl + '/campanas_user/' + id);
  }

  public getCampaignInform(id) {
    return this.http.get(this.baseUrl + '/campana_inform/' + id);
  }

  public getClients() {
    return this.http.get(this.baseUrl + '/clients');
  }

  public getTipoCampanas() {
    return this.http.get(this.baseUrl + '/campaigns_type');
  }

  public postCreateCampaign(campaign) {
    return this.http.post(this.baseUrl + '/campana_new', campaign);
  }

  public postCreateReportCampaignFile(file) {
    return this.http.post(this.baseUrl + '/new_report_file', file);
  }

  public postGetUser(userId) {
    return this.http.get(this.baseUrl + '/user/' + userId);
  }

}
