import h from"./Form.bf869eb8.js";import{_ as w,L as y,u as V,c as k,w as o,r as t,o as x,a as n,b as c,d as v,e as g}from"./app.993b55c8.js";const C={components:{FormVue:h,Link:y},props:{client:Object},setup(e){var l,s,f,p,r,i,a,_,d,u;return{form:V({email:(s=(l=e.client)==null?void 0:l.email)!=null?s:null,fullname:(p=(f=e.client)==null?void 0:f.fullname)!=null?p:null,phone:(i=(r=e.client)==null?void 0:r.phone)!=null?i:null,country:(_=(a=e.client)==null?void 0:a.country)!=null?_:null,city:(u=(d=e.client)==null?void 0:d.city)!=null?u:null})}}},F=c("h5",null,"Editar Cliente",-1),L={class:"card-footer"},B={class:"row"},N={class:"col-6"},j={class:"col-6"};function D(e,m,l,s,f,p){const r=t("v-row"),i=t("FormVue"),a=t("v-btn"),_=t("Link"),d=t("v-card"),u=t("v-responsive"),b=t("v-container");return x(),k(b,null,{default:o(()=>[n(u,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[n(r,{justify:"space-between pa-4 mb-2"},{default:o(()=>[F]),_:1}),n(d,{class:"p-0 m-0"},{default:o(()=>[c("form",{onSubmit:m[0]||(m[0]=g(E=>s.form.put("/clients/"+l.client.id),["prevent"]))},[n(i,{roles:e.roles,formData:s.form},null,8,["roles","formData"]),c("div",L,[c("div",B,[c("div",N,[n(a,{disabled:s.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[v(" Guardar ")]),_:1},8,["disabled"])]),c("div",j,[n(_,{href:"/clients",as:"button",class:"w-100"},{default:o(()=>[n(a,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[v(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const O=w(C,[["render",D]]);export{O as default};
