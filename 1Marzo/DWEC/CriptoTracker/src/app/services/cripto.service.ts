import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({ providedIn: 'root' })
export class CriptoService {
  private api = 'https://api.coingecko.com/api/v3';

  constructor(private http: HttpClient) {}

  getTopCoins() {
    return this.http.get<any[]>(`${this.api}/coins/markets`, {
      params: {
        vs_currency: 'eur',
        order: 'market_cap_desc',
        per_page: 50,
        page: 1,
        sparkline: false
      }
    });
  }

  getMarketData(ids: string[]) {
    return this.http.get<any[]>(`${this.api}/coins/markets`, {
      params: {
        vs_currency: 'eur',
        ids: ids.join(','),
        order: 'market_cap_desc',
        sparkline: false
      }
    });
  }

  getCoinDetails(id: string) {
    return this.http.get(`${this.api}/coins/${id}`, {
      params: {
        localization: 'false',
        tickers: 'false',
        market_data: 'true',
        community_data: 'false',
        developer_data: 'false',
        sparkline: 'false'
      }
    });
  }

  getHistoricalChart(id: string) {
    return this.http.get(`${this.api}/coins/${id}/market_chart`, {
      params: {
        vs_currency: 'eur',
        days: '30'
      }
    });
  }
}
