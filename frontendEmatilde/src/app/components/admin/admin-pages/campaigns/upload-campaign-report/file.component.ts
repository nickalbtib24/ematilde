import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { HttpEvent, HttpEventType } from '@angular/common/http';


@Component({
  selector: 'app-file',
  templateUrl: './file.component.html',
  styleUrls: ['./file.component.css']
})
export class FileComponent implements OnInit {

  form: FormGroup;
  progress: number = 0;

  constructor(
    public fb: FormBuilder
  ) { }

  ngOnInit() { }

  uploadFile(event) {
    const file = (event.target as HTMLInputElement).files[0];
    this.form.patchValue({
      infdashboard: file
    });
    this.form.get('infdashboard').updateValueAndValidity()
  }

  submitUser() {

  }

}
