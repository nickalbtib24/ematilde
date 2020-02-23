import { Component, OnInit } from '@angular/core';
import { PrincipalService } from 'src/app/services/principal.service';
import { Router } from '@angular/router';
import { MatDialog, MatDialogRef } from '@angular/material';
import { Observable } from 'rxjs';
import { ProgressSpinnerDialogComponent } from 'src/app/components/progress-spinner-dialog/progress-spinner-dialog.component';

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
    password_confirmation: null,
    identificacion_usuario: '11323',
    empresa_usuario: null,
    telefono_usuario: null,
    direccion_usuario: 'Calle 174',
    tipo_cliente: null,

  };
  public tipoUsuarios = null;

  public response = [];

  public error = [];

  public dialogRef: MatDialogRef<ProgressSpinnerDialogComponent>;

  constructor(
    private Principal: PrincipalService,
    private Routers: Router,
    private dialog: MatDialog
    ) { }

  ngOnInit() {
    this.Principal.getTipoClientes().subscribe((data: any[]) => {
      console.log(data);
      this.tipoUsuarios = data;
    });
  }

  public onSubmit() {
    const observable = new Observable(this.myObservable);
    this.showProgressSpinnerUntilExecuted(observable);
    this.Principal.signup(this.form).subscribe(
     error => this.handleError(error),
   );
  }

  public handleError(error) {
    this.error = error;
    if (error.success) {
      this.Routers.navigateByUrl('/login');
    }
    this.dialogRef.close();

  }

  public myObservable(observer) {
    setTimeout(() => {
      observer.next('done waiting for 5 sec');
      observer.complete();
    }, 2000);
  }

   public showProgressSpinnerUntilExecuted(observable: Observable<Object>) {
    this.dialogRef = this.dialog.open(ProgressSpinnerDialogComponent, {
      panelClass: 'transparent',
      disableClose: true
    });
  }

  public ngOnDestroy(): void {
    this.dialogRef.close();
  }

}
