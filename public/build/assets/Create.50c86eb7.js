import v from"./Form.518c8aec.js";import{_ as b,L as w,u as h,c as x,w as o,r as e,o as V,a as s,b as t,d as i,e as k}from"./app.360d8a91.js";const C={components:{FormVue:v,Link:w},props:{definitions:Object,permissions:Object},setup(){return{form:h({permissions:[],name:"",description:""})}}},g=t("h5",null,"Crear Nuevo Rol",-1),F={class:"card-footer"},L={class:"row"},N={class:"col-6"},j={class:"col-6"};function B(d,r,a,n,y,D){const _=e("v-row"),l=e("FormVue"),c=e("v-btn"),m=e("Link"),p=e("v-card"),f=e("v-responsive"),u=e("v-container");return V(),x(u,null,{default:o(()=>[s(f,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:o(()=>[s(_,{justify:"space-between pa-4 mb-2"},{default:o(()=>[g]),_:1}),s(p,{class:"p-0 m-0"},{default:o(()=>[t("form",{onSubmit:r[0]||(r[0]=k(O=>n.form.post("/roles"),["prevent"]))},[s(l,{permissions:a.permissions,formData:n.form,definitions:a.definitions},null,8,["permissions","formData","definitions"]),t("div",F,[t("div",L,[t("div",N,[s(c,{disabled:n.form.processing,type:"submit",rounded:"lg",color:"success",class:"w-100"},{default:o(()=>[i(" Guardar ")]),_:1},8,["disabled"])]),t("div",j,[s(m,{href:"/roles",as:"button",class:"w-100"},{default:o(()=>[s(c,{rounded:"lg",color:"danger",class:"w-100 text-white"},{default:o(()=>[i(" Cancelar ")]),_:1})]),_:1})])])])],32)]),_:1})]),_:1})]),_:1})}const R=b(C,[["render",B]]);export{R as default};