import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-logs',
  templateUrl: './logs.component.html',
  styleUrls: ['./logs.component.css']
})
export class LogsComponent implements OnInit {
  logs: string | undefined;

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.http.get<{content: string}>('http://localhost/api/v1/logs').subscribe(
      data => {
        this.logs = data.content;
      },
      error => {
        console.error('Error:', error);
      }
    );
  }

  clearLogs(): void {
    this.http.get('http://localhost/api/v1/logs/clear').subscribe(
      () => {
        this.logs = '';
        console.log('Logs cleared');
      },
      error => {
        console.error('Error:', error);
      }
    );
  }

  listTickets() {
    /*
    this.http.get('http://localhost/api/v1/listNotClosedTickets').subscribe(
    );
    this.http.get('http://localhost/api/v1/listHighPriorityTickets').subscribe(
    );
    */

    this.http.get('http://localhost/api/v1/listTicketsOfHighPriorityNotClosed').subscribe(
    );


    location.reload();
  }
}


