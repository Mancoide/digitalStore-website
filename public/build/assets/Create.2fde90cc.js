import f from"./Form.a301e9b4.js";import{_ as v,L as w,u as b,c as h,w as o,r as e,o as k,a as s,b as t,d as r,e as g}from"./app.993b55c8.js";const x={components:{FormVue:f,Link:w},setup(){return{form:b({name:null,cost:null})}}},V=t("h5",null,"Nuevo Plan",-1),C={class:"card-footer"},F={class:"row"},L={class:"col-6"},N={class:"col-6"};function B(_,a,y,n,D,$){const l=e("v-row"),d=e("FormVue"),c=e("v-btn"),i=e("Link"),m=e("v-card"),p=e("v-responsive"),u=e("v-container");return k(),h(u,null,{default:o(()=>[s(p,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[s(l,{justify:"space-between pa-4 mb-2"},{default:o(()=>[V]),_:1}),s(m,{class:"p-0 m-0"},{default:o(()=>[t("form",{onSubmit:a[0]||(a[0]=g(j=>n.form.post("/packages"),["prevent"]))},[s(d,{formData:n.form},null,8,["formData"]),t("div",C,[t("div",F,[t("div",L,[s(c,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[r(" Guardar ")]),_:1},8,["disabled"])]),t("div",N,[s(i,{href:"/packages",as:"button",class:"w-100"},{default:o(()=>[s(c,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[r(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const P=v(x,[["render",B]]);export{P as default};
