import{_ as r,L as i,j as p,f as c,a as g,r as d,o as m}from"./app.f7fe2db2.js";const u={components:{Link:i},props:{links:Array},data(){let n=window.location.search.substring(1),e=new URLSearchParams(n).get("page");return{location:window.location.pathname,page:e?parseInt(e):1}},methods:{reloadPage(n,e){p.Inertia.visit(e+"?page="+n)}}},_={class:"text-center"};function f(n,e,a,v,o,s){const l=d("v-pagination");return m(),c("div",_,[g(l,{modelValue:o.page,"onUpdate:modelValue":e[0]||(e[0]=t=>o.page=t),length:a.links.length-2,"total-visible":7,onClick:e[1]||(e[1]=t=>s.reloadPage(o.page,o.location))},null,8,["modelValue","length"])])}const h=r(u,[["render",f]]);export{h as default};
