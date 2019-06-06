import Vue from 'vue'
import VueRouter from 'vue-router'

/** import Dashboard */
import HomeComponent from './components/HomeComponent'

/** import Shopping */
import ShoppingComponent from './components/pages/shopping/ShoppingComponent.vue'

/** import Library */
import LibraryComponent from './components/pages/library/items/LibraryComponent.vue'
import CategoriesComponent from './components/pages/library/categories/CategoriesComponent.vue'
import SkuComponent from './components/pages/library/sku/SkuComponent.vue'

/** import Inventory */ 
import InventoryComponent from './components/pages/inventory/inventory/InventoryComponent.vue'
import SuppliersComponent from './components/pages/inventory/suppliers/SuppliersComponent.vue'
import PurchaseComponent from './components/pages/inventory/purchase/PurchaseComponent.vue'

/** import Employee */
import RolesComponent from './components/pages/employee/roles/RolesComponent.vue'
import StaffComponent from './components/pages/employee/staff/StaffComponent.vue'

/** import Report */
import ReportComponent from './components/pages/report/report/ReportComponent.vue'
import PurchaseReportComponent from './components/pages/report/purchase/PurchaseReportComponent.vue'
import SaleReportComponent from './components/pages/report/sale/SaleReportComponent.vue'
import SkuReportComponent from './components/pages/report/sku/SkuReportComponent.vue'

/** import Profile */
import ProfileComponent from './components/pages/profile/ProfileComponent.vue'

/** import Module */
import ModuleComponent from './components/pages/module/ModuleComponent.vue'

/** import Settings */
import SettingsComponent from './components/pages/settings/SettingsComponent.vue'

/** import Help */
import HelpComponent from './components/pages/help/HelpComponent.vue'

Vue.use(VueRouter)
export default new VueRouter({
    routes: [
        { path: '/', component: ShoppingComponent },
        { path: '/dashboard', component: HomeComponent },
        { path: '/library', component: LibraryComponent },
        { path: '/categories', component: CategoriesComponent },
        { path: '/stock-keeping-unit', component: SkuComponent },
        { path: '/inventory', component: InventoryComponent },
        { path: '/suppliers', component: SuppliersComponent },
        { path: '/purchase', component: PurchaseComponent },
        { path: '/role', component: RolesComponent },
        { path: '/staff', component: StaffComponent },
        { path: '/report', component: ReportComponent },
        { path: '/sales-report', component: SaleReportComponent },
        { path: '/purchase-report', component: PurchaseReportComponent },
        { path: '/stock-keeping-unit-report', component: SkuReportComponent },
        { path: '/profile', component: ProfileComponent },
        { path: '/module', component: ModuleComponent },
        { path: '/settings', component: SettingsComponent },
        { path: '/help', component: HelpComponent }
    ]
})