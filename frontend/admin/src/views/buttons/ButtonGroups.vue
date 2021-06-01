<template>
  <CRow>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Bootstrap button group</strong>
          <div class="card-header-actions">
            <a
              class="card-header-action"
              href="https://coreui.io/vue/docs/components/button-components"
              rel="noreferrer noopener"
              target="_blank"
            >
              <small class="text-muted">docs</small>
            </a>
          </div>
        </CCardHeader>
        <CCardBody>
          <div>
            <CButtonGroup>
              <CButton color="secondary">One</CButton>
              <CButton color="secondary">Two</CButton>
              <CButton color="secondary">Three</CButton>
              <CButton color="secondary">Four</CButton>
              <CButton class="d-sm-down-none" color="secondary">Five</CButton>
            </CButtonGroup>
            <br /><br />
            <CButtonGroup>
              <CButton class="d-sm-down-none" color="success">Success</CButton>
              <CButton color="info">Info</CButton>
              <CButton color="warning">Warn</CButton>
              <CButton class="d-sm-down-none" color="primary">Primary</CButton>
              <CButton color="danger">Danger</CButton>
              <CButton color="link">Link</CButton>
            </CButtonGroup>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Button group </strong>sizing
        </CCardHeader>
        <CCardBody>
          <div>
            <CButtonGroup>
              <CButton color="secondary">Left</CButton>
              <CButton color="secondary">Middle</CButton>
              <CButton color="secondary">Right</CButton>
            </CButtonGroup>
            <br /><br />
            <CButtonGroup size="sm">
              <CButton color="secondary">Left</CButton>
              <CButton color="secondary">Middle</CButton>
              <CButton color="secondary">Right</CButton>
            </CButtonGroup>
            <br /><br />
            <CButtonGroup size="lg">
              <CButton color="secondary">Left</CButton>
              <CButton color="secondary">Middle</CButton>
              <CButton color="secondary">Right</CButton>
            </CButtonGroup>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Button group </strong>dropdown support
        </CCardHeader>
        <CCardBody>
          <div>
            <CButtonGroup>
              <CButton class="d-sm-down-none" color="secondary"
                >Button 1
              </CButton>
              <CButton class="d-sm-down-none" color="secondary"
                >Button 2
              </CButton>
              <CDropdown color="success" right text="Menu">
                <CDropdownItem>Item 1</CDropdownItem>
                <CDropdownItem>Item 2</CDropdownItem>
                <CDropdownDivider />
                <CDropdownItem>Item 3</CDropdownItem>
              </CDropdown>
              <CButton class="d-sm-down-none" color="secondary"
                >Button 3
              </CButton>
              <CDropdown color="info" right split text="Split Menu">
                <CDropdownItem>Item 1</CDropdownItem>
                <CDropdownItem>Item 2</CDropdownItem>
                <CDropdownDivider />
                <CDropdownItem>Item 3</CDropdownItem>
              </CDropdown>
            </CButtonGroup>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Button group </strong>vertical variation
        </CCardHeader>
        <CCardBody>
          <div>
            <CButtonGroup vertical>
              <CButton color="secondary">Top</CButton>
              <CButton color="secondary">Middle</CButton>
              <CButton color="secondary">Bottom</CButton>
            </CButtonGroup>
          </div>
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="12">
      <CCard>
        <CCardHeader>
          <CIcon name="cil-justify-center" />
          <strong> Button toolbar </strong>
          <small>with button groups</small>
        </CCardHeader>
        <CCardBody>
          <CButtonToolbar aria-label="Toolbar with button groups">
            <CButtonGroup class="mx-1">
              <CButton class="d-sm-down-none" color="secondary"
                >&laquo;
              </CButton>
              <CButton color="secondary">&lsaquo;</CButton>
            </CButtonGroup>
            <CButtonGroup class="mx-1">
              <CButton class="d-sm-down-none" color="secondary">Edit</CButton>
              <CButton color="secondary">Undo</CButton>
              <CButton color="secondary">Redo</CButton>
            </CButtonGroup>
            <CButtonGroup class="mx-1">
              <CButton color="secondary">&rsaquo;</CButton>
              <CButton class="d-sm-down-none" color="secondary"
                >&raquo;
              </CButton>
            </CButtonGroup>
          </CButtonToolbar>
          <hr class="d-sm-down-none" />
          <CButtonToolbar
            aria-label="Toolbar with button groups and input groups"
            class="d-sm-down-none"
          >
            <CButtonGroup class="mx-1" size="sm">
              <CButton color="secondary">New</CButton>
              <CButton color="secondary">Edit</CButton>
            </CButtonGroup>
            <CInput
              append=".00"
              class="mb-0 w-25 mx-1"
              prepend="$"
              size="sm"
              value="100"
            />
            <CSelect
              :options="['Large', 'Medium', 'Small']"
              class="mb-0 w-25 mx-1"
              custom
              prepend="Size"
              size="sm"
              value="Medium"
            />
            <CButtonGroup class="mx-1" size="sm">
              <CButton color="secondary">Save</CButton>
              <CButton color="secondary">Cancel</CButton>
            </CButtonGroup>
          </CButtonToolbar>
          <hr />
          <CButtonToolbar
            aria-label="Toolbar with button groups and dropdown menu"
          >
            <CButtonGroup class="mx-1 d-sm-down-none">
              <CButton color="secondary">New</CButton>
              <CButton color="secondary">Edit</CButton>
              <CButton color="secondary">Undo</CButton>
            </CButtonGroup>
            <CDropdown
              button-content="Menu"
              class="mx-1"
              color="secondary"
              placement="bottom-end"
            >
              <CDropdownItem>Item 1</CDropdownItem>
              <CDropdownItem>Item 2</CDropdownItem>
              <CDropdownItem>Item 3</CDropdownItem>
            </CDropdown>
            <CButtonGroup class="mx-1">
              <CButton color="secondary">Save</CButton>
              <CButton color="secondary">Cancel</CButton>
            </CButtonGroup>
          </CButtonToolbar>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>
<script>
export default {
  name: "ButtonGroups"
};
</script>
