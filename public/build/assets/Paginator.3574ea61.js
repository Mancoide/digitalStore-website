import{_ as l,L as i,j as p,f as g,a as c,r as d,o as m}from"./app.993b55c8.js";const u={components:{Link:i},props:{links:Array},data(){let n=window.location.search.substring(1),e=new URLSearchParams(n).get("page");return{page:e?parseInt(e):1}},methods:{reloadPage(n){p.Inertia.visit("/users?page="+n)}}},_={class:"text-center"};function f(n,e,o,v,t,s){const r=d("v-pagination");return m(),g("div",_,[c(r,{modelValue:t.page,"onUpdate:modelValue":e[0]||(e[0]=a=>t.page=a),length:o.links.length-2,"total-visible":7,onClick:e[1]||(e[1]=a=>s.reloadPage(t.page))},null,8,["modelValue","length"])])}const P=l(u,[["render",f]]);export{P as default};
