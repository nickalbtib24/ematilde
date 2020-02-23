import { Component, OnInit, ElementRef, ViewChild } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { HttpEvent, HttpEventType } from '@angular/common/http';
import { PrincipalService } from 'src/app/services/principal.service';

@Component({
  selector: 'app-file',
  templateUrl: './file.component.html',
  styleUrls: ['./file.component.css']
})
export class FileComponent implements OnInit {
  @ViewChild('path', null) path: ElementRef;
  @ViewChild('message', null) message: ElementRef;

  public uploadFileForm: FormGroup;
  public progress: number = 0;

  constructor(
    private formBuilder: FormBuilder,
    private rest: PrincipalService
  ) { 
    this.uploadFileForm = this.formBuilder.group({
    });
  }

  ngOnInit() { }

  public onFileChange(files: any) {
    const file: File = files[0];
    this.path.nativeElement.value = file.name;
    if (this.isCSVfile(file.name)) {
      const headers = new Headers();
      const options = { headers }; // Create header
      const formData = new FormData();
      formData.append('file', file);
      console.log(file);
      this.rest.postCreateReportCampaignFile(formData).subscribe(
        (data) => console.log(data)
        );
    }
  }

  submitUser() {

  }

  public isCSVfile(csv: string): boolean {
    let isCSV = false;
    if (csv.endsWith('.csv')) {
      this.message.nativeElement.value = 'Sending file';
      isCSV = true;
    } else {
      this.message.nativeElement.value = 'Please upload a file of type csv.';
      console.log('Error:', this.message.nativeElement.value);
    }
    return isCSV;
  }

}
