import { useHead } from '@unhead/vue'; //head内のメタタグを書き換えるライブラリ
import { ref, onMounted } from 'vue';
import { MetaData } from '../types/MetaData.type';

/**
 * metaタグjsonを読み込む共通関数
 * 
 * @param string fileName
 * @return MetaData
 */
export function useMetaData(fileName: string) {
  const metaData = ref<MetaData | null>(null); // useHeadに扱うリアクティブ変数を設定する
  onMounted(async () => {
    try {
      const response = await fetch('/data/meta/'+fileName+'.json');
      const data = await response.json();
      metaData.value = data as MetaData;
      if (metaData.value !== null) {
        useHead({
          title: metaData.value.title,
          meta: metaData.value.meta,
          script: metaData.value.script ? metaData.value.script.map(script => ({ src: script.src })) : [],
        });
      }
    } catch (error) {
      console.error('Failed to fetch meta data:', error);
    }
  });

  return {
    metaData,
  };
}
