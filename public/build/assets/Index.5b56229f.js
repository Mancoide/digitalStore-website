import w from"./Paginator.ee2b1951.js";import{_ as y,L as T,c as V,w as s,r as e,o as l,a as o,d as C,b as t,f as i,i as L,F as N,t as a}from"./app.360d8a91.js";import B from"./TableActions.dfc3f784.js";const E={data(){return{items:[{name:"Editar",icon:"mdi-pencil-outline",navigateTo:"clients/:id/edit"}]}},components:{Pagination:w,TableActionsVue:B,Link:T},props:{clients:Object}},A=t("h5",null,"Clientes",-1),j=t("thead",null,[t("tr",null,[t("td"),t("td",null,"#"),t("td",null,"Nombre"),t("td",null,"Telefono"),t("td",null,"E-mail"),t("td",null,"Pa\xEDs"),t("td",null,"Ciudad"),t("td",null,"Estado")])],-1),F={class:"align-items-center"},P={class:"text-left"},R={class:"text-center text-white"};function D(d,I,c,O,r,S){const _=e("v-btn"),u=e("Link"),m=e("v-row"),p=e("TableActionsVue"),v=e("v-badge"),f=e("v-table"),b=e("pagination"),g=e("v-card-text"),h=e("v-card"),x=e("v-responsive"),k=e("v-container");return l(),V(k,null,{default:s(()=>[o(x,{"aspect-ratio":"16 / 9",class:"pa-4"},{default:s(()=>[o(m,{justify:"space-between pa-4 mb-2"},{default:s(()=>[A,o(u,{href:"clients/create",as:"button"},{default:s(()=>[o(_,{variant:"outlined",color:"success","prepend-icon":"mdi-plus"},{default:s(()=>[C(" Nuevo Cliente ")]),_:1})]),_:1})]),_:1}),o(h,{class:"table-responsive border"},{default:s(()=>[o(g,null,{default:s(()=>[o(f,{class:"table table-striped"},{default:s(()=>[j,t("tbody",F,[(l(!0),i(N,null,L(c.clients.data,n=>(l(),i("tr",{key:n.id},[t("td",P,[o(p,{items:r.items,idRegister:n.id},null,8,["items","idRegister"])]),t("td",null,a(n.id),1),t("td",null,a(n.fullname),1),t("td",null,a(n.phone),1),t("td",null,a(n.email),1),t("td",null,a(n.country),1),t("td",null,a(n.city),1),t("td",R,[o(v,{color:n.status.badge,content:n.status.name},null,8,["color","content"])])]))),128))])]),_:1}),o(b,{links:c.clients.links},null,8,["links"])]),_:1})]),_:1})]),_:1})]),_:1})}const G=y(E,[["render",D]]);export{G as default};