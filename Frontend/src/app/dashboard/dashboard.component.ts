import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service'
import { Names } from '../names';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  names:  Names[];
  selectedNames:  Names  = { codigo : null , nome: null, email: null};

  createOrUpdateNames(form){
    if(this.selectedNames && this.selectedNames.codigo){
      form.value.id = this.selectedNames.codigo;
      this.apiService.updateNames(form.value).subscribe((names: Names)=>{
        console.log("Name updated" , names);
      });
    }
    else{
      this.apiService.createNames(form.value).subscribe((names: Names)=>{
        console.log("Name created, ", names);
      });
    }
  }
 
  selectNames(names: Names){
    this.selectedNames = names;
  }
 
  deleteNames(codigo){
    this.apiService.deleteNames(codigo).subscribe((names: Names)=>{
      console.log("Name deleted, ", names);
    });
  }
 
  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.apiService.readNames().subscribe((names: Names[])=>{
      this.names = names;
      console.log(this.names);
    })
  }
}

 
