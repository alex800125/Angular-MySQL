import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Names } from './names';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class ApiService {
  
  PHP_API_SERVER = "http://127.0.0.1:8080";

  readNames(): Observable<Names[]>{
    return this.httpClient.get<Names[]>(`${this.PHP_API_SERVER}/read.php`);
  }
  createNames(names: Names): Observable<Names>{
    return this.httpClient.post<Names>(`${this.PHP_API_SERVER}/create.php`, names);
  }
  updateNames(names: Names){
    return this.httpClient.put<Names>(`${this.PHP_API_SERVER}/update.php`, names);   
  }
  deleteNames(codigo: number){
    return this.httpClient.delete<Names>(`${this.PHP_API_SERVER}/delete.php/?codigo=${codigo}`);
  }

  constructor(private httpClient: HttpClient) {}
}

