import f from"./Form.2f7b853d.js";import{_ as v,L as w,u as b,c as h,w as o,r as e,o as g,a as t,b as s,d as c,e as x}from"./app.993b55c8.js";const V={components:{FormVue:f,Link:w},setup(){return{form:b({name:null})}}},k=s("h5",null,"Nueva Categoria",-1),C={class:"card-footer"},F={class:"row"},L={class:"col-6"},N={class:"col-6"};function B(_,a,y,n,D,$){const d=e("v-row"),l=e("FormVue"),r=e("v-btn"),i=e("Link"),m=e("v-card"),u=e("v-responsive"),p=e("v-container");return g(),h(p,null,{default:o(()=>[t(u,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[t(d,{justify:"space-between pa-4 mb-2"},{default:o(()=>[k]),_:1}),t(m,{class:"p-0 m-0"},{default:o(()=>[s("form",{onSubmit:a[0]||(a[0]=x(j=>n.form.post("/categories"),["prevent"]))},[t(l,{formData:n.form},null,8,["formData"]),s("div",C,[s("div",F,[s("div",L,[t(r,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[c(" Guardar ")]),_:1},8,["disabled"])]),s("div",N,[t(i,{href:"/categories",as:"button",class:"w-100"},{default:o(()=>[t(r,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[c(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const S=v(V,[["render",B]]);export{S as default};
