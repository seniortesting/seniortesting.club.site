import AvueEditor from './quill-editor'

AvueEditor.install = function (Vue) {
  Vue.component(AvueEditor.name, AvueEditor)
}

export default AvueEditor
