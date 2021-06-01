<template>
  <div>
    <CRow>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Bootstrap Dropdown</strong>
            <div class="card-header-actions">
              <a
                class="card-header-action"
                href="https://coreui.io/vue/docs/components/dropdown"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">docs</small>
              </a>
            </div>
          </CCardHeader>
          <CCardBody>
            <div>
              <CDropdown
                class="m-2"
                color="secondary"
                toggler-text="Dropdown Button"
              >
                <CDropdownItem>First Action</CDropdownItem>
                <CDropdownItem>Second Action</CDropdownItem>
                <CDropdownItem>Third Action</CDropdownItem>
                <CDropdownDivider />
                <CDropdownItem>Something else here...</CDropdownItem>
                <CDropdownItem disabled>Disabled action</CDropdownItem>
              </CDropdown>
            </div>
            <!-- <div>
              <CDropdown toggler-text="Dropdown using buttons as menu items" class="m-2">
                <CDropdownItem>I'm a button</CDropdownItem>
                <CDropdownItem>I'm also a button</CDropdownItem>
                <CDropdownItem disabled>I'm a button, but disabled!</CDropdownItem>
                <CDropdownItem>I don't look like a button, but I am!</CDropdownItem>
              </CDropdown>
            </div> -->
            <div>
              <CDropdown
                class="m-2"
                color="secondary"
                toggler-text="Dropdown with divider"
              >
                <CDropdownItem>First item</CDropdownItem>
                <CDropdownItem>Second item</CDropdownItem>
                <CDropdownDivider />
                <CDropdownItem>Separated Item</CDropdownItem>
              </CDropdown>
            </div>
            <div>
              <CDropdown
                class="m-2"
                color="secondary"
                toggler-text="Dropdown with header"
              >
                <CDropdownHeader>Dropdown header</CDropdownHeader>
                <CDropdownItem>First item</CDropdownItem>
                <CDropdownItem>Second Item</CDropdownItem>
              </CDropdown>
            </div>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Dropdown </strong>
            <small>positioning</small>
          </CCardHeader>
          <CCardBody>
            <div>
              <CDropdown
                class="m-2 d-inline-block"
                color="primary"
                toggler-text="Left align"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here</CDropdownItem>
              </CDropdown>
              <CDropdown
                class="m-2 d-inline-block"
                color="primary"
                placement="bottom-end"
                toggler-text="Right align"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here</CDropdownItem>
              </CDropdown>
            </div>
            <div>
              <CDropdown
                class="m-2"
                color="info"
                placement="top-start"
                toggler-text="Drop-Up"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here</CDropdownItem>
              </CDropdown>
            </div>
            <div>
              <CDropdown
                :offset="[10, 5]"
                class="m-2"
                color="secondary"
                toggler-text="Offset Dropdown"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here</CDropdownItem>
              </CDropdown>
            </div>
            <div>
              <CDropdown
                class="m-2"
                color="secondary"
                split
                toggler-text="Split Dropdown"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here...</CDropdownItem>
              </CDropdown>
            </div>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Dropdown </strong>
            <small>hidden caret</small>
          </CCardHeader>
          <CCardBody>
            <div>
              <CDropdown :caret="false" color="link" size="lg">
                <template #toggler-content>
                  &#x1f50d;<span class="sr-only">Search</span>
                </template>
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here...</CDropdownItem>
              </CDropdown>
            </div>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Dropdown </strong>
            <small>sizing</small>
          </CCardHeader>
          <CCardBody>
            <div>
              <CDropdown
                class="m-2 d-inline-block"
                color="secondary"
                size="lg"
                toggler-text="Large"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here</CDropdownItem>
              </CDropdown>
              <CDropdown
                class="m-2"
                color="secondary"
                size="lg"
                split
                toggler-text="Large Split"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here...</CDropdownItem>
              </CDropdown>
              <br />
              <CDropdown
                class="m-2 d-inline-block"
                color="secondary"
                size="sm"
                toggler-text="Small"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here...</CDropdownItem>
              </CDropdown>
              <CDropdown
                class="m-2"
                color="secondary"
                size="sm"
                split
                toggler-text="Small Split"
              >
                <CDropdownItem>Action</CDropdownItem>
                <CDropdownItem>Another action</CDropdownItem>
                <CDropdownItem>Something else here...</CDropdownItem>
              </CDropdown>
            </div>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Dropdown </strong>
            <small>headers and accessibility</small>
          </CCardHeader>
          <CCardBody>
            <div>
              <CDropdown
                class="m-2"
                color="primary"
                toggler-text="Dropdown ARIA"
              >
                <div role="group">
                  <CDropdownHeader>Groups</CDropdownHeader>
                  <CDropdownItem>Add</CDropdownItem>
                  <CDropdownItem>Delete</CDropdownItem>
                </div>
                <div role="group">
                  <CDropdownHeader>Users</CDropdownHeader>
                  <CDropdownItem>Add</CDropdownItem>
                  <CDropdownItem>Delete</CDropdownItem>
                </div>
                <CDropdownDivider />
                <CDropdownItem>
                  Something <strong>not</strong> associated with user
                </CDropdownItem>
              </CDropdown>
            </div>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol col="12" md="6">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-justify-center" />
            <strong> Dropdown </strong>
            <small><code>color</code></small>
          </CCardHeader>
          <CCardBody>
            <CDropdown
              class="m-0 d-inline-block"
              color="primary"
              size="sm"
              toggler-text="Primary"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="secondary"
              size="sm"
              toggler-text="Secondary"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="success"
              size="sm"
              toggler-text="Success"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="warning"
              size="sm"
              toggler-text="Warning"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="danger"
              size="sm"
              toggler-text="Danger"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="info"
              size="sm"
              toggler-text="Info"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="light"
              size="sm"
              toggler-text="Light"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="dark"
              size="sm"
              toggler-text="Dark"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
            <CDropdown
              class="m-0 d-inline-block"
              color="link"
              size="sm"
              toggler-text="Link"
            >
              <CDropdownItem>First Action</CDropdownItem>
              <CDropdownItem>Second Action</CDropdownItem>
              <CDropdownItem>Third Action</CDropdownItem>
            </CDropdown>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
export default {
  name: "Dropdowns"
};
</script>
