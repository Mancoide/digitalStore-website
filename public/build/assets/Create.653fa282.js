import v from"./Form.560e0558.js";import{_ as b,L as w,u as h,c as x,w as o,r as e,o as V,a as s,b as t,d as c,e as k}from"./app.06d20473.js";const g={components:{FormVue:v,Link:w},props:{roles:Object},setup(){return{form:h({email:null,phone:null,fullname:null,country:null,city:null})}}},y=t("h5",null,"Nuevo Usuario",-1),C={class:"card-footer"},F={class:"row"},L={class:"col-6"},N={class:"col-6"};function B(l,r,_,n,j,D){const d=e("v-row"),i=e("FormVue"),a=e("v-btn"),u=e("Link"),m=e("v-card"),p=e("v-responsive"),f=e("v-container");return V(),x(f,null,{default:o(()=>[s(p,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[s(d,{justify:"space-between pa-4 mb-2"},{default:o(()=>[y]),_:1}),s(m,{class:"p-0 m-0"},{default:o(()=>[t("form",{onSubmit:r[0]||(r[0]=k(G=>n.form.post("/clients"),["prevent"]))},[s(i,{roles:_.roles,formData:n.form},null,8,["roles","formData"]),t("div",C,[t("div",F,[t("div",L,[s(a,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[c(" Guardar ")]),_:1},8,["disabled"])]),t("div",N,[s(u,{href:"/clients",as:"button",class:"w-100"},{default:o(()=>[s(a,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[c(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const S=b(g,[["render",B]]);export{S as default};
