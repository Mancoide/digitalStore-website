import k from"./Form.83ba302a.js";import{_ as g,L as w,u as h,c as x,w as o,r as t,o as V,a as e,b as a,d as m,e as I}from"./app.360d8a91.js";const F={components:{FormVue:k,Link:w},props:{statuses:Object,packageInfo:Object},setup(c){var n,s,l,i,r,_;return{form:h({name:(s=(n=c.packageInfo)==null?void 0:n.name)!=null?s:null,cost:(i=(l=c.packageInfo)==null?void 0:l.cost)!=null?i:null,status_id:(_=(r=c.packageInfo)==null?void 0:r.status_id)!=null?_:null})}}},L=a("h5",null,"Editar Plan",-1),j={class:"card-footer"},B={class:"row"},C={class:"col-6"},N={class:"col-6"};function y(c,d,n,s,l,i){const r=t("v-row"),_=t("FormVue"),u=t("v-btn"),f=t("Link"),p=t("v-card"),v=t("v-responsive"),b=t("v-container");return V(),x(b,null,{default:o(()=>[e(v,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[e(r,{justify:"space-between pa-4 mb-2"},{default:o(()=>[L]),_:1}),e(p,{class:"p-0 m-0"},{default:o(()=>[a("form",{onSubmit:d[0]||(d[0]=I(D=>s.form.put("/packages/"+n.packageInfo.id),["prevent"]))},[e(_,{statuses:n.statuses,formData:s.form},null,8,["statuses","formData"]),a("div",j,[a("div",B,[a("div",C,[e(u,{disabled:s.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[m(" Guardar ")]),_:1},8,["disabled"])]),a("div",N,[e(f,{href:"/packages",as:"button",class:"w-100"},{default:o(()=>[e(u,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[m(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const G=g(F,[["render",y]]);export{G as default};