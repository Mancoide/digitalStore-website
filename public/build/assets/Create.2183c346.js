import v from"./Form.1873ffe1.js";import{_ as b,L as w,u as h,c as x,w as o,r as e,o as V,a as s,b as t,d as c,e as k}from"./app.993b55c8.js";const g={components:{FormVue:v,Link:w},props:{users:Object},setup(){return{form:h({user_id:null,amount:null,observation:null,balance_adjust:null})}}},C=t("h5",null,"Nuevo Saldo",-1),F={class:"card-footer"},L={class:"row"},N={class:"col-6"},j={class:"col-6"};function B(l,a,_,n,T,y){const d=e("v-row"),i=e("FormVue"),r=e("v-btn"),u=e("Link"),m=e("v-card"),p=e("v-responsive"),f=e("v-container");return V(),x(f,null,{default:o(()=>[s(p,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[s(d,{justify:"space-between pa-4 mb-2"},{default:o(()=>[C]),_:1}),s(m,{class:"p-0 m-0"},{default:o(()=>[t("form",{onSubmit:a[0]||(a[0]=k(D=>n.form.post("/creditTransactions"),["prevent"]))},[s(i,{users:_.users,formData:n.form},null,8,["users","formData"]),t("div",F,[t("div",L,[t("div",N,[s(r,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[c(" Guardar ")]),_:1},8,["disabled"])]),t("div",j,[s(u,{href:"/creditTransactions",as:"button",class:"w-100"},{default:o(()=>[s(r,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[c(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const M=b(g,[["render",B]]);export{M as default};
