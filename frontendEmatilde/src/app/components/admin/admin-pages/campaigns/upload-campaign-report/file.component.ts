import { Component, OnInit, ViewEncapsulation, ViewChild, ElementRef } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { HttpEvent, HttpEventType } from '@angular/common/http';
import { PrincipalService } from 'src/app/services/principal.service';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-file',
  templateUrl: './file.component.html',
  styleUrls: ['./file.component.css']
})
export class FileComponent implements OnInit {

  @ViewChild('path', null) path: ElementRef;
  @ViewChild('fileInput', null) fileInput: ElementRef;


  progress: number;
  public message = '';
  isVisible: boolean;
  reportForm: FormGroup;
  public formData: FormData;

  constructor(
    private formBuilder: FormBuilder,
    private rest: PrincipalService,
    private Route: ActivatedRoute,
  ) {
    this.reportForm = this.formBuilder.group({});
  }

  ngOnInit() { }

  public onFileChange(files: any) {
    const file: File = files[0];
    this.path.nativeElement.value = file.name;
    if (this.isCSVfile(file.name)) {
      const headers = new Headers();
      const options = { headers }; // Create header
      this.formData = new FormData();
      this.formData.append('file', file); // Append file to formdata
      this.isVisible = true;
    }
  }
  public onSubmit() {
    const id = this.Route.snapshot.paramMap.get('id');
    this.formData.append('campaign', id);
    this.rest.postCreateReportCampaignFile(this.formData).subscribe(
      data => console.log(data)
    );
  }
  public isCSVfile(csv: string): boolean {
    let isCSV = false;
    if (csv.endsWith('.csv')) {
      isCSV = true;
      this.message = '';
    } else {
      console.log('kk');
      this.message = 'Please upload a file of type csv.';
    }
    return isCSV;
  }

  submitUser() {

  }

}
