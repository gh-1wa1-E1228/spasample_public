<script setup lang="ts">
// メタタグ情報のJSONをリアクティブ変数metaDataに入れてメタタグを反映する
import { useMetaData } from "../composables/useMetaData";
const { metaData } = useMetaData("index");
import { ref, onMounted, watch} from 'vue';
import { useRoute } from 'vue-router';
import { ArticleListData } from '../types/ArticleListData.type';
import { PagerData } from "../types/PagerData.type";

const articleListDatas = ref<ArticleListData | null>(null); // リアクティブ変数を設定する
   
const route = useRoute();
const pager = ref<PagerData | null>(null);

const page = route.params.page != null ? ref(route.params.page) : ref(1);
const limit = route.params.limit != null ? ref(route.params.limit) : ref(9);
const categoryId = route.params.category_id != null ? ref('/'+route.params.category_id) : ref('');

const fetchData = async () => {
    page.value = route.params.page != null ? route.params.page : '1';
    limit.value = route.params.limit != null ? route.params.limit : '9';
    categoryId.value = route.params.category_id != null ? '/'+route.params.category_id : '';
    try {
        const response = await fetch('/api/article/list/'+page.value+'/'+limit.value+ categoryId.value);
        const data = await response.json();
        articleListDatas.value = data.items as ArticleListData;
        pager.value =  data.pager as PagerData;

    } catch (error) {
        console.error('Failed to fetch meta data:', error);
    }
};

onMounted(() => {
    fetchData();
});

watch(
    () => route.params,
    () => {
        fetchData();
    }
);

</script>
<template>
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col" v-for="(item,index) in articleListDatas">
                        <div class="card shadow-sm">
                            <div class="image-container">
                                <img :src="item.thumbnail_image" alt="Thumbnail">
                            </div>
                            <div class="card-body">
                                <small>{{ item.category_name }}</small>
                                <h4>{{ item.title  }}</h4>
                                <p class="card-text">
                                    {{ item.description  }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="mt-4" aria-label="..." v-if="pager!=null">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled" v-if="pager.prev==null">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item" v-else>
                        <router-link class="page-link" :to="`/vuejs/${pager.prev}/${limit}${categoryId}`">Previous</router-link>
                    </li>
                    <template v-for="num in pager.pages">
                    <li class="page-item" v-if="pager.current!=num">
                        <router-link class="page-link" :to="`/vuejs/${num}/${limit}${categoryId}`">{{ num }}</router-link>
                    </li>
                    <li class="page-item" v-else>
                        <span class="page-link active" >{{ num }}</span>
                    </li>
                    </template>
                    <li class="page-item disabled" v-if="pager.next==null">
                        <span class="page-link">Next</span>
                    </li>
                    <li class="page-item" v-else>
                        <router-link class="page-link" :to="`/vuejs/${pager.next}/${limit}${categoryId}`">Next</router-link>
                    </li>

                </ul>
            </nav>
        </div>
    </main>
</template>

<style>
.image-container {
    position: relative;
    width: 100%;
    height: 225px; /* 固定の高さを指定 */
    background-color: #55595c;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-container img {
    height: 100%;
    width: auto;
    max-width: none;
    object-fit: cover;
}

</style>