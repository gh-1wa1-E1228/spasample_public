export type PagerData = {
    current: number;
    first:number;
    prev:number|null;
    pages:[number] | null;
    next:number|null;
    last:number;
    limit:number;
    count:number;
};
  