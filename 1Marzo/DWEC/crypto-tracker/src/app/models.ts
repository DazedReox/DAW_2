export interface CoinMarket {
  id: string;
  symbol: string;
  name: string;
  image: string;
  current_price: number;
  market_cap: number;
  total_volume: number;
  high_24h: number;
  low_24h: number;
}

export interface CoinDetail {
  id: string;
  symbol: string;
  name: string;
  description: { [lang: string]: string };
  image: { large: string };
  market_data: {
    current_price: { eur: number };
  };
  genesis_date: string;
  links: {
    homepage: string[];
    repos_url: { github: string[] };
  };
}
