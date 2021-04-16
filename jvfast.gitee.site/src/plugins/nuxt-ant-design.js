import Vue from 'vue'
import {
  // basic component
  Alert, message, notification, Modal, LocaleProvider, Layout, Button,
  Row, Col,
  // extend component
  Drawer,
  Form,
  FormModel,
  Table,
  List,
  Input,
  InputNumber,
  Avatar,
  DatePicker,
  Select,
  Checkbox,
  Radio,
  Descriptions
} from 'ant-design-vue'

export default () => {
  // -----------------------basic component--------------
  Vue.use(LocaleProvider)
  Vue.use(Layout)
  Vue.use(Button)
  Vue.use(Row)
  Vue.use(Col)
  // notification
  Vue.use(Alert)
  Vue.use(Modal)
  Vue.prototype.$message = message
  Vue.prototype.$notification = notification
  Vue.prototype.$info = Modal.info
  Vue.prototype.$success = Modal.success
  Vue.prototype.$error = Modal.error
  Vue.prototype.$warning = Modal.warning
  Vue.prototype.$confirm = Modal.confirm
  // -----------------------extend component--------------
  Vue.use(Drawer)
  Vue.use(Form)
  Vue.use(FormModel)
  Vue.use(Table)
  Vue.use(List)
  Vue.use(Input)
  Vue.use(InputNumber)
  Vue.use(Avatar)
  Vue.use(DatePicker)
  Vue.use(Select)
  Vue.use(Checkbox)
  Vue.use(Radio)
  Vue.use(Descriptions)
}
