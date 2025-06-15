import { Component, OnInit } from '@angular/core';
import { CriptoService } from '../services/cripto.service';
import { PortfolioService } from '../portfolio.store';

@Component({
  selector: 'app-portfolio',
  templateUrl: './portfolio.html',
  styleUrls: ['./portfolio.css']
})
export class PortfolioComponent implements OnInit {
  topCoins: any[] = [];
  selectedCoins: any[] = [];

  constructor(
    private criptoService: CriptoService,
    private portfolioStore: PortfolioService
  ) {}

  ngOnInit() {
    this.criptoService.getTopCoins().subscribe((coins) => {
      this.topCoins = coins;
      const ids = this.portfolioStore.getCoins();
      this.updateSelected(ids);
    });
  }

  toggleCoin(id: string) {
    if (this.portfolioStore.hasCoin(id)) {
      this.portfolioStore.removeCoin(id);
    } else {
      this.portfolioStore.addCoin(id);
    }
    this.updateSelected(this.portfolioStore.getCoins());
  }

  updateSelected(ids: string[]) {
    if (ids.length === 0) {
      this.selectedCoins = [];
      return;
    }
    this.criptoService.getMarketData(ids).subscribe((data) => {
      this.selectedCoins = data;
    });
  }
}
