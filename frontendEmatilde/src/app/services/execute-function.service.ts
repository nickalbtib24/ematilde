import { Injectable, EventEmitter } from '@angular/core';
import { Subscription } from 'rxjs/internal/Subscription';


@Injectable({
  providedIn: 'root'
})
export class ExecuteFunctionService {

  invokeNavbarComponentFunction = new EventEmitter();
  subsVar: Subscription;
  constructor() { }

  onFirstComponentButtonClick() {
    this.invokeNavbarComponentFunction.emit();
  }
}
