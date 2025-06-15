import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header';
import { FooterComponent } from './components/footer';
import { MonedasComponent } from './components/monedas';
import { DetalleMonedaComponent } from './components/detalle-moneda';
import { HomeComponent } from './pages/home';
import { PortfolioComponent } from './pages/portfolio';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    MonedasComponent,
    DetalleMonedaComponent,
    HomeComponent,
    PortfolioComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
