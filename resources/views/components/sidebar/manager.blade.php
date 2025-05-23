               <p class="text-gray-500 dark:text-gray-400 uppercase font-semibold text-xs px-4 py-2 tracking-wider">
                  Production
               </p>
               <li>
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                     <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 294 294">
                        <g>
                          <path d="M279,250H15c-8.284,0-15,6.716-15,15s6.716,15,15,15h264c8.284,0,15-6.716,15-15S287.284,250,279,250z"></path>
                          <path d="M30.5,228h47c5.247,0,9.5-4.253,9.5-9.5v-130c0-5.247-4.253-9.5-9.5-9.5h-47c-5.247,0-9.5,4.253-9.5,9.5v130 C21,223.747,25.253,228,30.5,228z"></path>
                          <path d="M123.5,228h47c5.247,0,9.5-4.253,9.5-9.5v-195c0-5.247-4.253-9.5-9.5-9.5h-47c-5.247,0-9.5,4.253-9.5,9.5v195 C114,223.747,118.253,228,123.5,228z"></path>
                          <path d="M216.5,228h47c5.247,0,9.5-4.253,9.5-9.5v-105c0-5.247-4.253-9.5-9.5-9.5h-47c-5.247,0-9.5,4.253-9.5,9.5v105 C207,223.747,211.253,228,216.5,228z"></path>
                        </g>
                      </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Overview</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('report.production_report') }}" 
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                     <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
                           aria-hidden="true" 
                           xmlns="http://www.w3.org/2000/svg" 
                           fill="currentColor" 
                           viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 10C15.5523 10 16 10.4477 16 11V17C16 17.5523 15.5523 18 15 18C14.4477 18 14 17.5523 14 17L14 11C14 10.4477 14.4477 10 15 10ZM12 11C12.5523 11 13 11.4477 13 12L13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17L11 12C11 11.4477 11.4477 11 12 11ZM10 14C10 13.4477 9.55229 13 9 13C8.44772 13 8 13.4477 8 14V17C8 17.5523 8.44772 18 9 18C9.55228 18 10 17.5523 10 17L10 14ZM12.482 1.99989C13.1608 1.99885 13.7632 1.99793 14.3196 2.2284C14.876 2.45887 15.3014 2.88551 15.7806 3.36624C16.7302 4.31875 17.6813 5.26983 18.6338 6.21942C19.1145 6.69867 19.5412 7.12401 19.7716 7.68041C20.0021 8.23682 20.0012 8.83926 20.0001 9.51807C19.9963 12.034 20 14.5499 20 17.0659C20.0001 17.9524 20.0001 18.7162 19.9179 19.3278C19.8297 19.9833 19.631 20.6117 19.1213 21.1214C18.6117 21.631 17.9833 21.8298 17.3278 21.9179C16.7161 22.0001 15.9523 22.0001 15.0658 22H8.9342C8.0477 22.0001 7.28388 22.0001 6.67221 21.9179C6.0167 21.8298 5.38835 21.631 4.87868 21.1214C4.36902 20.6117 4.17028 19.9833 4.08215 19.3278C3.99991 18.7162 3.99995 17.9524 4 17.0659L4.00001 7.00004C4.00001 6.97802 4 6.95607 4 6.93421C3.99995 6.04772 3.99991 5.28391 4.08215 4.67224C4.17028 4.01673 4.36902 3.38838 4.87869 2.87872C5.38835 2.36905 6.0167 2.17031 6.67221 2.08218C7.28387 1.99994 8.04769 1.99998 8.93418 2.00003C10.1168 2.0001 11.2994 2.00171 12.482 1.99989Z"/>
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Production Reports</span>
                     <span class="inline-flex items-center justify-center w-2 h-2 p-3 ms-1 text-sm font-semibold text-green-950 bg-green-400 rounded-full">
                        {{ $submittedCount }}
                     </span>
                  </a>
               </li>
               <li>
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
                           aria-hidden="true" 
                           xmlns="http://www.w3.org/2000/svg" 
                           fill="currentColor" 
                           viewBox="0 0 32 32">
                        <g id="SVGRepo_iconCarrier">
                        <defs>
                           <style>.cls-1{fill:currentColor;}</style>
                        </defs>
                        <rect class="cls-1" height="10" rx="1" ry="1" width="6" x="17" y="17"></rect>
                        <rect class="cls-1" height="16" rx="1" ry="1" width="6" x="25" y="11"></rect>
                        <rect class="cls-1" height="12" rx="1" ry="1" width="6" x="9" y="15"></rect>
                        <rect class="cls-1" height="7" rx="1" ry="1" width="6" x="1" y="20"></rect>
                        <path d="M31,25H1v3a3,3,0,0,0,3,3H28a3,3,0,0,0,3-3Z"></path>
                        <path class="cls-1" d="M4,17H2a1,1,0,0,1,0-2H3.52L10,6.94a1,1,0,1,1,1.56,1.24L4.78,16.62A1,1,0,0,1,4,17Z"></path>
                        <path class="cls-1" d="M21.25,11.44a1,1,0,0,1-.62-.22,1,1,0,0,1-.16-1.4l6.75-8.44A1,1,0,0,1,28,1h2a1,1,0,0,1,0,2H28.48L22,11.06A1,1,0,0,1,21.25,11.44Z"></path>
                        <rect class="cls-1" height="6" transform="translate(-0.8 16.4) rotate(-53.14)" width="2" x="15" y="6"></rect>
                        <circle cx="12" cy="6" r="3"></circle>
                        <circle cx="20" cy="11.99" r="3"></circle>
                        </g>
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Analytics & Reports</span>
                  </a>
               </li>
               <li>
                  <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                           <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                           <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                           <g id="SVGRepo_iconCarrier">
                           <title>Audiomack icon</title>
                           <path d="M.33 11.39s.54-.09.77.14c.22.23.07.71-.22.72-.3.01-.57.06-.77-.14a.443.443 0 01.22-.72zm5.88 3.26c-.05.01-.11-.02-.16-.06-.39-.53-.53-2.37-.71-2.48-.18-.11-.85 1.02-2.19.9-.55-.05-1.12-.41-1.45-.66.03-.41.03-1.39.86-1.07.51.19 1.37.72 2.13-.23.84-1.05 1.3-.74 1.57-.51.28.22.1 1.41.51 1.08.41-.33 2.08-2.39 2.08-2.39s1.29-1.29 1.49.06c.2 1.36 1.04 2.87 1.27 2.82.22-.04 2.82-5.27 3.19-5.61.37-.34 1.63-.29 1.57.57-.06.87-.19 6.25-.19 6.25s-.15 1.52.09.71c.1-.34.21-.64.34-1 .64-2.03 1.73-5.51 2.28-7.3.12-.42.23-.79.32-1.07v-.01c.03-.13.06-.23.09-.32.05-.15.08-.26.09-.28.02-.07.09-.12.19-.16.09-.06.2-.06.31-.06.31-.03.69.01 1.04.11.11 0 .22.03.32.11 0 0 .01 0 .02.01.03.02.06.05.1.1h.01c.01.02.03.05.05.07.19.29.31.81.19 1.74-.3 2.31-.53 7.07-.53 7.07s-.05.23.44-.77c.01-.04.03-.07.05-.1.03-.02.06-.04.1-.08.29-.36 1.09-.56 1.65-.56.23.03.43.09.54.16.22.33.09 1.55.09 1.55-.46.04-1.34.29-1.65.33-.31.05-.78 2.05-1.44 1.85-.66-.21-2.13-1.12-2.13-1.24 0-.11.12-1.44.15-1.79v-.07-.01c.03-.27.01-.39-.12-.12-.11.23-.58 1.72-1.11 3.34-.05.14-1.05 3.13-1.18 3.49-.15.42-.29.75-.38.91-.13.19-.32.3-.58.23-.65-.2-1.46-1.08-1.47-1.3-.02-1.24.06-7.9-.24-7.35-.32.57-2.73 4.52-2.73 4.52-.04.01-.07.01-.11.01-.17-.02-.44-.07-.51-.23 0-.01-.01-.02-.01-.03-.01-.01-.01-.02-.02-.04-.03-.11-.04-.23-.07-.33-.11-.36-.28-.88-.47-1.4-.27-.9-.56-1.82-.61-1.92-.09-.2-.22-.12-.35 0-.54.45-1.68 2.45-2.72 2.56z"></path>
                           </g>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Production Metrics</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                  </button>
                  <ul id="dropdown-example" class="hidden py-2 space-y-2">
                     <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Product Standard</a>
                     </li>
                     <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Key Performance Indicator (KPI) </a>
                     </li>
                  </ul>
