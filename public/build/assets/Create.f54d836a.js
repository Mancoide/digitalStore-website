import v from"./Form.b7c46b5f.js";import{_ as b,L as w,u as h,c as x,w as o,r as e,o as V,a as s,b as t,d as c,e as k}from"./app.993b55c8.js";const g={components:{FormVue:v,Link:w},props:{roles:Object},setup(){return{form:h({document_number:null,email:null,phone:null,fullname:null,username:null,password:null,rol_id:null})}}},C=t("h5",null,"Nuevo Usuario",-1),F={class:"card-footer"},L={class:"row"},N={class:"col-6"},B={class:"col-6"};function j(l,r,_,n,y,D){const d=e("v-row"),u=e("FormVue"),a=e("v-btn"),i=e("Link"),m=e("v-card"),p=e("v-responsive"),f=e("v-container");return V(),x(f,null,{default:o(()=>[s(p,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[s(d,{justify:"space-between pa-4 mb-2"},{default:o(()=>[C]),_:1}),s(m,{class:"p-0 m-0"},{default:o(()=>[t("form",{onSubmit:r[0]||(r[0]=k(G=>n.form.post("/users"),["prevent"]))},[s(u,{roles:_.roles,formData:n.form},null,8,["roles","formData"]),t("div",F,[t("div",L,[t("div",N,[s(a,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[c(" Guardar ")]),_:1},8,["disabled"])]),t("div",B,[s(i,{href:"/users",as:"button",class:"w-100"},{default:o(()=>[s(a,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[c(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const S=b(g,[["render",j]]);export{S as default};
