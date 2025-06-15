import { Component, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-monedas',
  templateUrl: './monedas.component.html',
  styleUrls: ['./monedas.component.css']
})
export class MonedasComponent {
  @Input() monedas: any[] = [];
  @Output() onDetalle = new EventEmitter<string>();
  @Output() onEliminar = new EventEmitter<string>();

  verDetalle(id: string) {
    this.onDetalle.emit(id);
  }

  eliminar(id: string) {
    this.onEliminar.emit(id);
  }
}
