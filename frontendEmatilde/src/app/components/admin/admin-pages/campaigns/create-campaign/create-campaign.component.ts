import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { PrincipalService } from 'src/app/services/principal.service';
@Component({
  selector: 'app-create-campaign',
  templateUrl: './create-campaign.component.html',
  styleUrls: ['./create-campaign.component.css']
})
export class CreateCampaignComponent implements OnInit {

  public form = {
    nombre_campana: null,
    tipo_campana: null,
    user_id: null,
    negocio_campana: null,
    fecha_inicio_campana: null,
    fecha_terminacion_campana: null,
  };
  public tipoUsuarios = null;

  public response = [];

  public error = [];

  public tipoCampanas;

  public clients;

  constructor(
    private Router: Router,
    private service: PrincipalService,
    private Principal: PrincipalService,
    ) {
      this.getTipoCampanas();
      this.getClients();
    }

  ngOnInit() {
  }

  public onSubmit() {
    console.log(this.form);
    this.Principal.postCreateCampaign(this.form).subscribe(
      (data) => console.log(data)
    );
  }

  public getTipoCampanas(): void {
    this.service.getTipoCampanas().subscribe(
      (data) => this.tipoCampanas = data
      );
  }

  public getClients(): void {
    this.service.getClients().subscribe(
      (data) => this.clients = data
    );
  }
}
