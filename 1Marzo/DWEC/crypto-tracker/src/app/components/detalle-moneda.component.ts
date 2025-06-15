import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-detalle-moneda',
  templateUrl: './detalle-moneda.component.html',
  styleUrls: ['./detalle-moneda.component.css']
})
export class DetalleMonedaComponent {
  @Input() moneda: any;

  getDescripcion(): string {
    if (this.moneda?.description?.es) return this.moneda.description.es;
    if (this.moneda?.description?.en) return this.moneda.description.en;
    return 'Descripción no disponible';
  }
}
