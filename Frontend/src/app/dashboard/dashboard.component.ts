import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service'
import { Names } from '../names';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  Names:  Names[];
  selectedNames:  Names  = { codigo : null , nome: null, email: null};

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.apiService.readNames().subscribe((Names: Names[])=>{
      this.Names = Names;
      console.log(this.Names);
    })

  }

}

 
