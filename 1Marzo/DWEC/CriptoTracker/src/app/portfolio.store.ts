import { Injectable } from '@angular/core';

@Injectable({ providedIn: 'root' })
export class PortfolioService {
  private key = 'portfolio';

  getCoins(): string[] {
    return JSON.parse(localStorage.getItem(this.key) || '[]');
  }

  addCoin(id: string) {
    const coins = this.getCoins();
    if (!coins.includes(id)) {
      coins.push(id);
      this.save(coins);
    }
  }

  removeCoin(id: string) {
    const coins = this.getCoins().filter((c) => c !== id);
    this.save(coins);
  }

  hasCoin(id: string): boolean {
    return this.getCoins().includes(id);
  }

  private save(coins: string[]) {
    localStorage.setItem(this.key, JSON.stringify(coins));
  }
}
