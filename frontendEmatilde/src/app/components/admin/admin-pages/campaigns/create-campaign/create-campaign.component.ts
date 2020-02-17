import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-campaign',
  templateUrl: './create-campaign.component.html',
  styleUrls: ['./create-campaign.component.css']
})
export class CreateCampaignComponent implements OnInit {

  public form = {
    nombre_campana: null,
    tipo_campana: null,
    usuario: null,
    negocio_campana: null,
    fecha_inicio: null,
    fecha_finalizacion: null,


  }
  public tipoUsuarios = null;

  public response = [];

  public error = [];

  public tipoCampanas;

  constructor(
    private Router: Router,
    ) { }

  ngOnInit() {

  }

  onSubmit(){

  }


}
