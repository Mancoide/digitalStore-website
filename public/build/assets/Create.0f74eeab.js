import f from"./Form.853ddb63.js";import{_ as v,L as g,u as b,c as w,w as o,r as e,o as k,a as t,b as s,d as l,e as h}from"./app.06d20473.js";const x={components:{FormVue:f,Link:g},props:{packages:Object,categories:Object},setup(){return{form:b({logo:null,previewImage:null,name:null,category_id:null,packages:[],quatity:[],costs:[]})}}},V=s("h5",null,"Nuevo Producto",-1),y={class:"card-footer"},C={class:"row"},F={class:"col-6"},L={class:"col-6"};function N(i,c,n,a,j,B){const _=e("v-row"),d=e("FormVue"),r=e("v-btn"),u=e("Link"),p=e("v-responsive"),m=e("v-container");return k(),w(m,null,{default:o(()=>[t(p,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[t(_,{justify:"space-between pa-4 mb-2"},{default:o(()=>[V]),_:1}),s("form",{onSubmit:c[0]||(c[0]=h(D=>a.form.post("/products"),["prevent"]))},[t(d,{categories:n.categories,packages:n.packages,formData:a.form},null,8,["categories","packages","formData"]),s("div",y,[s("div",C,[s("div",F,[t(r,{disabled:a.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[l(" Guardar ")]),_:1},8,["disabled"])]),s("div",L,[t(u,{href:"/products",as:"button",class:"w-100"},{default:o(()=>[t(r,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[l(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})}const G=v(x,[["render",N]]);export{G as default};
