export type MetaData = {
    title: string;
    meta: Array<{ name: string; content: string }>;
    script: Array<{ src: string; tagPosition: string }> | null;
};
  